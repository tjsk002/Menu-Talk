
{{--start modal--}}
@php

@endphp
        <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
{{--                    <form method="get" id="downloadForm" action="{{route('manage.invoice', ['userId' => $userId,])}}">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div class="modal-header">--}}
{{--                            <h5 class="modal-title" id="exampleModalLabel" style="padding-left: 15px;">Invoice PDF Download</h5>--}}
{{--                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="padding-right: 40px;"></button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body" style="padding: 30px;">--}}
{{--                            <select style="height: 38px; border-radius: 0.375rem;" class="form-select form-select-sm" name="language">--}}
{{--                                <option value="en" selected>en</option>--}}
{{--                                <option value="ko">ko</option>--}}
{{--                                <option value="ja">ja</option>--}}
{{--                                <option value="zh-CN">zh-CN</option>--}}
{{--                                <option value="zh-TW">zh-TW</option>--}}
{{--                            </select>--}}
{{--                            <input id="company_name" type="text" class="form-control" name="company_name" placeholder="company name">--}}
{{--                            <input id="tax_id" type="text" class="form-control" name="tax_id" placeholder="tax id">--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer" style="padding: 15px 30px 0;">--}}
{{--                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                            <button type="submit" class="btn btn-primary">--}}
{{--                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M7.5 25H22.5C23.8807 25 25 23.8807 25 22.5V10.8224C25 10.2309 24.7903 9.6585 24.4081 9.20705L20.7489 4.88469C20.2739 4.32359 19.576 4 18.8409 4H7.5C6.11929 4 5 5.11929 5 6.5V22.5C5 23.8807 6.11929 25 7.5 25Z" fill="#EAEAE5">--}}
{{--                                    </path><rect x="2" y="12" width="18" height="10" rx="2" fill="#D33C3C"></rect>--}}
{{--                                    <path d="M4.378 20V15.044H6.394C7.514 15.051 8.2 15.744 8.2 16.752C8.2 17.774 7.5 18.453 6.366 18.446H5.54V20H4.378ZM5.54 17.522H6.156C6.702 17.529 6.996 17.221 6.996 16.752C6.996 16.29 6.702 15.996 6.156 15.996H5.54V17.522ZM10.7332 20H8.92718V15.044H10.7332C12.2452 15.051 13.1762 15.975 13.1832 17.522C13.1762 19.069 12.2452 20 10.7332 20ZM10.0892 19.006H10.6912C11.5452 19.006 12.0072 18.6 12.0072 17.522C12.0072 16.451 11.5452 16.045 10.6772 16.038H10.0892V19.006ZM14.0096 20V15.044H17.3696V15.996H15.1716V17.046H17.1456V17.998H15.1716V20H14.0096Z" fill="white">--}}
{{--                                    </path>--}}
{{--                                </svg>--}}
{{--                                <span style="vertical-align: middle">Download</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                </div>
            </div>
        </div>