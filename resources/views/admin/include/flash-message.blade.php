@if(session()->has('deleteFail'))
    <div class="alert alert-danger">
        <li><span style="font-size: 16px;">{{session()->get('deleteFail')}}</span></li>
    </div>
@endif
@if(session()->has('updateFail'))
    <div class="alert alert-danger" >
        <li><span style="font-size: 16px;">{{session()->get('updateFail')}}</span></li>
    </div>
@endif
@if(session()->has('searchFail'))
    <div class="alert alert-danger">
        <li><span style="font-size: 16px;">{{session()->get('searchFail')}}</span></li>
    </div>
@endif
@if(session()->has('findFail'))
    <div class="alert alert-danger" >
        <li><span style="font-size: 16px;">{{session()->get('findFail')}}</span></li>
    </div>
@endif
@if(session()->has('delete'))
    <div class="alert alert-success" >
        <li><span style="font-size: 16px;">{{session()->get('delete')}}</span></li>
    </div>
@endif
@if(session()->has('update'))
    <div class="alert alert-success" >
        <li><span style="font-size: 16px;">{{session()->get('update')}}</span></li>
    </div>
@endif
@if(session()->has('search'))
    <div class="alert alert-success" >
        <li><span style="font-size: 16px;">{{session()->get('search')}}</span></li>
    </div>
@endif
@if(session()->has('find'))
    <div class="alert alert-success" >
        <li><span style="font-size: 16px;">{{session()->get('find')}}</span></li>
    </div>
@endif

