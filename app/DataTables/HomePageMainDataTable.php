<?php
namespace App\DataTables;
use App\Models\HomePage;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved [It V 1.6.8 | https://it.phpanonymous.com]
class HomePageMainDataTable extends DataTable
{
    	

     /**
     * dataTable to render Columns.
     * Auto Ajax Method By Baboon Script [It V 1.6.8 | https://it.phpanonymous.com]
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('actions', 'admin.homepagemain.buttons.actions')

   		->addColumn('created_at', '{{ date("Y-m-d H:i:s",strtotime($created_at)) }}')   		->addColumn('updated_at', '{{ date("Y-m-d H:i:s",strtotime($updated_at)) }}')            ->addColumn('checkbox', '<div  class="icheck-danger d-inline ml-2">
           <input type="checkbox" class="selected_data"  name="selected_data[]" id="selectdata{{ $id }}" value="{{ $id }}" >
           <label for="selectdata{{ $id }}"></label>
                </div>')
            ->rawColumns(['checkbox','actions',]);
    }
  

     /**
     * Get the query object to be processed by dataTables.
     * Auto Ajax Method By Baboon Script [It V 1.6.8 | https://it.phpanonymous.com]
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
	public function query()
    {
        return HomePage::query()->select("home_pages.*");

    }
    	

    	 /**
	     * Optional method if you want to use html builder.
	     *[It V 1.6.8 | https://it.phpanonymous.com]
	     * @return \Yajra\Datatables\Html\Builder
	     */
    	public function html()
	    {
	      $html =  $this->builder()
            ->columns($this->getColumns())
            //->ajax('')
            ->parameters([
               'responsive'   => true,
                'dom' => 'Blfrtip',
                "lengthMenu" => [[10, 25, 50,100, -1], [10, 25, 50,100, trans('admin.all_records')]],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn dark btn-outline', 'text' => '<i class="fa fa-print"></i> '.trans('admin.print')],
                    ['extend' => 'excel', 'className' => 'btn green btn-outline', 'text' => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_excel')],
                    ['extend' => 'csv', 'className' => 'btn purple btn-outline', 'text' => '<i class="fa fa-file-excel"> </i> '.trans('admin.export_csv')],
                    ['extend' => 'reload', 'className' => 'btn blue btn-outline', 'text' => '<i class="fa fa-sync-alt"></i> '.trans('admin.reload')],
                    [
                        'text' => '<i class="fa fa-trash"></i> '.trans('admin.delete'),
                        'className'    => 'btn red btn-outline deleteBtn',
                    ], [
                        'text' => '<i class="fa fa-plus"></i> '.trans('admin.add'),
                        'className'    => 'btn btn-primary',
                        'action'    => 'function(){
                        	window.location.href =  "'.\URL::current().'/create";
                        }',
                    ],
                ],
                'initComplete' => "function () {


            ". filterElement('1,2,1,3,1,4,1,5,1,6,1,7,1,8,1,9,1,10,1,11', 'input') . "
            

            }",
                'order' => [[1, 'desc']],

                    'language' => [
                       'sProcessing' => trans('admin.sProcessing'),
							'sLengthMenu'        => trans('admin.sLengthMenu'),
							'sZeroRecords'       => trans('admin.sZeroRecords'),
							'sEmptyTable'        => trans('admin.sEmptyTable'),
							'sInfo'              => trans('admin.sInfo'),
							'sInfoEmpty'         => trans('admin.sInfoEmpty'),
							'sInfoFiltered'      => trans('admin.sInfoFiltered'),
							'sInfoPostFix'       => trans('admin.sInfoPostFix'),
							'sSearch'            => trans('admin.sSearch'),
							'sUrl'               => trans('admin.sUrl'),
							'sInfoThousands'     => trans('admin.sInfoThousands'),
							'sLoadingRecords'    => trans('admin.sLoadingRecords'),
							'oPaginate'          => [
								'sFirst'            => trans('admin.sFirst'),
								'sLast'             => trans('admin.sLast'),
								'sNext'             => trans('admin.sNext'),
								'sPrevious'         => trans('admin.sPrevious'),
							],
							'oAria'            => [
								'sSortAscending'  => trans('admin.sSortAscending'),
								'sSortDescending' => trans('admin.sSortDescending'),
							],
                    ]
                ]);

        return $html;

	    }

    	

    	/**
	     * Get columns.
	     * Auto getColumns Method By Baboon Script [It V 1.6.8 | https://it.phpanonymous.com]
	     * @return array
	     */

	    protected function getColumns()
	    {
	        return [
	        [
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<div  class="icheck-danger d-inline ml-2">
                  <input type="checkbox" class="select-all" id="select-all"  onclick="select_all()" >
                  <label for="select-all"></label>
                </div>',
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => false,
                'width'          => '10px',
                'aaSorting'      => 'none'
            ],[
                'name' => 'id',
                'data' => 'id',
                'title' => trans('admin.record_id'),
                'width'          => '10px',
                'aaSorting'      => 'none'
            ],
				[
                 'name'=>'first_title_ar',
                 'data'=>'first_title_ar',
                 'title'=>trans('admin.first_title_ar'),
		    ],
				[
                 'name'=>'description_ar',
                 'data'=>'description_ar',
                 'title'=>trans('admin.description_ar'),
		    ],
				[
                 'name'=>'second_title_ar',
                 'data'=>'second_title_ar',
                 'title'=>trans('admin.second_title_ar'),
		    ],
				[
                 'name'=>'YouTupe_url',
                 'data'=>'YouTupe_url',
                 'title'=>trans('admin.YouTupe_url'),
		    ],
				[
                 'name'=>'workers',
                 'data'=>'workers',
                 'title'=>trans('admin.workers'),
		    ],
				[
                 'name'=>'certificates',
                 'data'=>'certificates',
                 'title'=>trans('admin.certificates'),
		    ],
				[
                 'name'=>'clients',
                 'data'=>'clients',
                 'title'=>trans('admin.clients'),
		    ],
				[
                 'name'=>'first_title_en',
                 'data'=>'first_title_en',
                 'title'=>trans('admin.first_title_en'),
		    ],
				[
                 'name'=>'description_en',
                 'data'=>'description_en',
                 'title'=>trans('admin.description_en'),
		    ],
				[
                 'name'=>'second_title_en',
                 'data'=>'second_title_en',
                 'title'=>trans('admin.second_title_en'),
		    ],
            [
	                'name' => 'created_at',
	                'data' => 'created_at',
	                'title' => trans('admin.created_at'),
	                'exportable' => false,
	                'printable'  => false,
	                'searchable' => false,
	                'orderable'  => false,
	            ],
	                    [
	                'name' => 'updated_at',
	                'data' => 'updated_at',
	                'title' => trans('admin.updated_at'),
	                'exportable' => false,
	                'printable'  => false,
	                'searchable' => false,
	                'orderable'  => false,
	            ],
	                    [
	                'name' => 'actions',
	                'data' => 'actions',
	                'title' => trans('admin.actions'),
	                'exportable' => false,
	                'printable'  => false,
	                'searchable' => false,
	                'orderable'  => false,
	            ]
	        ];
	    }
    	

	    /**
	     * Get filename for export.
	     * Auto filename Method By Baboon Script
	     * @return string
	     */
	    protected function filename()
	    {
	        return 'homepagemain_' . time();
	    }
    	
}