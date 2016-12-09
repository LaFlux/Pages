@extends('Dashboard::dashboard.dashboard')
@section('content-header')

    <!-- Navigation Starts-->
    @include('Dashboard::dashboard.partials.headersidebar')
    <!-- Navigation Ends-->

@stop
@section('content-area')

 <!-- page content -->
        <div class="right_col"  role="main">
          <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <h2>{{$title}}</h2>
                </div>
            </div>
        </div>
        <?php
          $ThemeHelper = with( new ExtensionsValley\Basetheme\Helpers\ThemeHelper);
        if (isset($pages)) {
            $button_text = "Update";
            $action = 'extensionsvalley.admin.updatepages';
        } else {
            $button_text = "Publish";
            $action = 'extensionsvalley.admin.savepages';
        }
        if (isset($viewmode)) {
            $readonly = "readonly";
        } else {
            $readonly = "";
        }

        ?>

            {!!Form::open(array('route' => $action, 'method' => 'post'))!!}
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="x_panel">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} control-required">
                        {!! Form::label('title', 'Title') !!} <span class="error_red">*</span>
                        {!! Form::text('title', isset($pages->title) ? $pages->title : \Input::old('title'), [
                            'class'       => 'form-control buildslug',
                            'placeholder' => 'Page Title',
                            'required'    => 'required',
                            'data-target' => 'placeslug',
                             $readonly
                        ]) !!}
                        <span class="error_red">{{ $errors->first('title') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }} control-required">
                        {!! Form::label('slug', 'Page URL') !!} <span class="error_red">*</span>
                        {!! Form::text('slug',isset($pages->slug) ? $pages->slug : \Input::old('slug'), [
                            'class'       => 'form-control placeslug',
                            'placeholder' => 'Page URL should be a valid url format it will auto created from your title',
                            'required'    => 'required',
                            $readonly
                        ]) !!}
                        <input type="hidden" name="old_slug" value="{{isset($pages->slug) ? $pages->slug : \Input::old('slug')}}"></input>
                        <span class="error_red">{{ $errors->first('slug') }}</span>
                    </div>
                </div>
            </div>

            <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }} control-required">
                        {!! Form::label('content', 'Page Content') !!} <span class="error_red">*</span>
                        {!! Form::textarea('content',isset($pages->content) ? $pages->content : \Input::old('content'), [
                            'class'       => 'form-control texteditor'
                        ]) !!}
                        <span class="error_red">{{ $errors->first('content') }}</span>
                    </div>
                </div>

            </div>



            @if(isset($pages->id))
                <input type="hidden" name="pages_id" value="{{$pages->id}}"/>
            @endif

            </div>
            </div>


              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="x_panel">
                <div class="x_title">
                          <h2>Publish Option</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                </div>
                  <div class="x_content">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }} control-required">
                        {!! Form::label('status', 'Status') !!} <span class="error_red">*</span>
                        {!! Form::select('status', array('1'=>'Publish','0'=>'Unpublish'), isset($pages->status) ? $pages->status :null, [
                            'class'       => 'form-control select2',
                            'required'    => 'required'
                        ]) !!}
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <a onclick="history.go(-1);" class="btn btn-success">Cancel</a>
                      @if(!isset($viewmode))
                          {!! Form::submit($button_text, ['class' => 'btn btn-primary']) !!}
                      @endif
                  </div>
                  </div>
              </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
              <div class="x_panel">
                <div class="x_title">
                          <h2>Layout Option</h2>
                          <ul class="nav navbar-right panel_toolbox">
                              <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                          </ul>
                          <div class="clearfix"></div>
                </div>
                  <div class="x_content">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group {{ $errors->has('layout') ? 'has-error' : '' }} control-required">

                        {!! Form::label('layout', 'Page Layout') !!} <span class="error_red">*</span>
                        {!! Form::select('layout',$ThemeHelper->getLayouts(), isset($pages->layout) ? $pages->layout :null, [
                            'class'       => 'form-control select2',
                            'required'    => 'required'
                        ]) !!}
                    </div>
                  </div>

                  </div>
              </div>
              </div>
            </div>
             <input type="hidden" name="accesstoken" value="{{\Input::has('accesstoken') ? \Input::get('accesstoken') : ''}}" />


            {!! Form::token() !!}
            {!! Form::close() !!}

    </div>


    <!-- /page content -->
@stop
