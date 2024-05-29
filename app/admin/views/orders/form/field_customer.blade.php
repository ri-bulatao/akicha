<div class="card-body">
    <h5 class="card-title">@lang($field->label)</h5>
    <div class="py-2 lead">
        @if ($formModel->customer)
            <a href="{{ admin_url('customers/preview/'.$formModel->customer_id) }}">{{ $formModel->customer_name }}</a>
        @else
            {{ $formModel->customer_name }}
        @endif
    </div>
    <div class="py-2">
        <i class="fa fa-envelope fa-fw text-muted"></i>&nbsp;&nbsp;
        {{ $formModel->email }}
    </div>
    @if ($formModel->telephone)
        <div class="py-2">
            <i class="fa fa-phone fa-fw text-muted"></i>&nbsp;&nbsp;
            {{ $formModel->telephone }}
        </div>
    @endif
</div>
@if ($formModel->isDeliveryType() && $formModel->address)
    <div class="card-body border-top">
        <h5 class="card-title">@lang('admin::lang.orders.label_delivery_address')</h5>
        <div class="py-2">
            {{ format_address($formModel->address->toArray()) }}
        </div>

        <div id="map" style="height: 500px; width: 100%;"></div>

        
    </div>
@endif


<script>
    function initialize() {
        // Define the address to be geocoded
        var location = "{{ $formModel->address->toArray()['address_2'] }}";

       // Create an array by splitting the string on the comma
        const latLngArray = location.split(','); // ['15.47609', '120.578971']

        // Ensure the array items are trimmed to remove extra spaces
        const cleanLatLngArray = latLngArray.map(item => item.trim());

        // Convert string values to numbers for consistency
        const numericalLatLngArray = cleanLatLngArray.map(parseFloat);

        console.log(latLngArray);

        var geocoder = new google.maps.Geocoder();
        var mapOptions = {
            zoom: 14,
            center: new google.maps.LatLng(numericalLatLngArray[0],numericalLatLngArray[1] ) // Default center, to be updated
        };
        
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        
        // Create a marker at the map's center
        var marker = new google.maps.Marker({
            zoom: 16,
            position: map.getCenter(), // Place the marker at the map's center
            map: map, // Attach the marker to the map
            title: "Customer Location", // Optional: add a title for the marker
        });
    }

    // Initialize the map on page load
    window.onload = initialize;
</script>



<!-- Add Google Maps JavaScript API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzBzTyWD60Jc60vU37F8fwwOL2jKkk3FI"></script>
