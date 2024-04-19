<div
    class="modal slideInDown fade"
    id="newWidgetModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="newWidgetModalTitle"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div id="{{ $this->getId('new-widget-modal-content') }}" class="modal-content">
            <div class="modal-body">
                <div class="progress-indicator">
                    <span class="spinner"><span class="ti-loading fa-3x fa-fw"></span></span>
                    @lang('admin::lang.text_loading')
                </div>
            </div>
        </div>
    </div>
</div>
@if ($this->canManage || $this->canSetDefault)
    <div class="toolbar-action pt-3">
        <button
            id="{{ $this->alias }}-daterange"
            class="btn btn-outline-default pull-right"
            data-control="daterange"
            data-start-date="{{ $startDate->format('m/d/Y') }}"
            data-end-date="{{ $endDate->format('m/d/Y') }}"
        >
            <i class="fa fa-calendar"></i>&nbsp;&nbsp;
            <span>{{$startDate->isoFormat($dateRangeFormat).' - '.$endDate->isoFormat($dateRangeFormat)}}</span>&nbsp;&nbsp;
            <i class="fa fa-caret-down"></i>
        </button>
    </div>
@endif
