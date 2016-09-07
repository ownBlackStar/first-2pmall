@extends('admin.layouts.master')

@section('content')
<div class="page-content">
    <!-- /section:settings.box -->
    <div class="page-header">
        <h1>
            店员管理
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                管理店员信息 &amp; 状态
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="table-header">
                店员列表
                <div class="navbar-buttons navbar-header pull-right">
                    <a href="{{ url('/admin/shop_user/create') }}" class="btn btn-pink">新增店员</a>
                </div>
            </div>
            <div class="dataTables_wrapper form-inline no-footer">
                <table id="simple-table" class="table table-bordered table-hover dataTable">
                    <thead>
                        <tr>
                            <th class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th class="center">店员编号</th>
                            <th class="center">店员名称</th>
                            <th class="center">负责人</th>
                            <th class="center"><i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>开店时间</th>
                            <th class="center">当前状态</th>
                            <th class="center">操作</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>
                            <td class="center">001</td>
                            <td class="center">名称</td>
                            <td class="center">李四</td>
                            <td class="center">2016-08-24 01:11:59</td>
                            <td class="center">
                                <span class="label label-sm label-warning">已付款</span>
                            </td>

                            <td class="center">
                                <div class="hidden-sm hidden-xs btn-group">
                                    <a title="查看" href="{{url('/admin/order/info')}}" class="btn btn-xs btn-success">
                                        <i class="ace-icon fa fa-search bigger-120"></i>
                                    </a>

                                    <!-- <a title="编辑" class="btn btn-xs btn-info">
                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                    </a> -->

                                    <!-- <button class="btn btn-xs btn-danger">
                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </button> -->

                                    <!-- <button class="btn btn-xs btn-warning">
                                        <i class="ace-icon fa fa-flag bigger-120"></i>
                                    </button> -->
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- PAGE CONTENT ENDS -->
                <div class="row">
                    <div class="col-xs-6">
                        <div class="dataTables_info" role="status" aria-live="polite">
                            显示 1 - 10 共 2 条数据
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
                            <ul class="pagination">
                                <li class="paginate_button previous disabled" aria-controls="dynamic-table" tabindex="0" id="dynamic-table_previous">
                                    <a href="#">上一页</a>
                                </li>
                                <li class="paginate_button active" aria-controls="dynamic-table" tabindex="0">
                                    <a href="#">1</a>
                                </li>
                                <li class="paginate_button " aria-controls="dynamic-table" tabindex="0">
                                    <a href="#">2</a>
                                </li>
                                <li class="paginate_button " aria-controls="dynamic-table" tabindex="0">
                                    <a href="#">3</a>
                                </li>
                                <li class="paginate_button next" aria-controls="dynamic-table" tabindex="0" id="dynamic-table_next">
                                    <a href="#">下一页</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div><!-- /.page-content -->
@stop

@section('footer-script')
<script>
$(function(){
    var active_class = 'active';
    $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
        var th_checked = this.checked;//checkbox inside "TH" table header

        $(this).closest('table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) {
                $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
            } else {
                $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            }
        });
    });

    //select/deselect a row when the checkbox is checked/unchecked
    $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
        var $row = $(this).closest('tr');
        if(this.checked) {
            $row.addClass(active_class);
        } else {
            $row.removeClass(active_class);
        }
    });
});
</script>
@stop