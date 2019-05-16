@extends('admin.layout.master')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-blue"></i>
                        <span class="caption-subject bold uppercase">Lending Package</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <form role="form" method="POST" action="{{route('package.update')}}">
                 {{ csrf_field() }}
                    <div class="form-group col-md-4">
                        <label>Name</label>
                        <input type="text" name="name" value="{{$pack->name}}" class="form-control" />
                    </div> 
                    <div class="form-group col-md-4">
                        <label for="min" >Minimum</label>
                        <div class="input-group">
                        <input type="text" name="min" value="{{$pack->min}}" class="form-control">
                          <span class="input-group-addon">{{$gnl->cursym}}</span>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="max">Maximum</label>
                        <div class="input-group">
                        <input type="text" name="max" value="{{$pack->max}}" class="form-control">
                          
                          <span class="input-group-addon">{{$gnl->cursym}}</span>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="return">Every Time Return</label>
                        <div class="input-group">
                           <input type="text" name="return" value="{{$pack->ret}}" class="form-control">
                          <span class="input-group-addon">%</span>
                        </div>
                       
                    </div>
                    <div class="form-group col-md-4">
                        <label for="times">Times</label>
                        <input type="text" name="times" value="{{$pack->times}}" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="period">Return Period</label>
                        <select name="period" class="form-control">
                          <option value="1" {{$pack->period == '1' ? 'selected' : ''}}>Hourly</option>
                          <option value="24" {{$pack->period == '24' ? 'selected' : ''}}>Daily (24 Hours)</option>
                          <option value="168" {{$pack->period == '168' ? 'selected' : ''}}>Weekly (168 Hours)</option>
                          <option value="720" {{$pack->period == '720' ? 'selected' : ''}}>Monthly (720 Hours)</option>
                          <option value="2880" {{$pack->period == '2880' ? 'selected' : ''}}>Quaterly (2880 Hours)</option>
                          <option value="8640" {{$pack->period == '8640' ? 'selected' : ''}}>Yearly (8640 Hours)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="total">Total Return</label>
                        <div class="input-group">
                        <input type="text" name="total" value="{{$pack->total}}" class="form-control" readonly>
                          <span class="input-group-addon">%</span>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="total">Refer Commision on Deposit</label>
                        <div class="input-group">
                        <input type="text" name="fixcom" value="{{$pack->fixcom}}" class="form-control">
                          <span class="input-group-addon">%</span>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="total">Refer Commision ov Every Return</label>
                        <div class="input-group">
                        <input type="text" name="pcncom" value="{{$pack->pcncom}}" class="form-control">
                          <span class="input-group-addon">%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-success btn-block" >Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection