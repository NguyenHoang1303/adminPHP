@extends('admin.master-admin')
@section('breadcrumb')
    <div class="page-title">
        <div class="title_left">
            <h3>Form Elements</h3>
        </div>
    </div>
@endsection


@section('page-content')

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br/>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" required="required" class="form-control ">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="last-name" name="last-name" required="required"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Middle Name /
                                Initial</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="middle-name">
                            </div>
                        </div>

                        <div class="form-group item">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Checkboxes and
                                radios</label>
                            <div class="col-md-6 col-sm-6 ">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> Option one. select more than one options
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value=""> Option two. select more than one options
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="" value="option1" id="optionsRadios1"
                                               name="optionsRadios"> Option one. only select one option
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios">
                                        Option two. only select one option
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                            <div class="col-md-6 col-sm-6 col-form-label">
                                <div class="checkbox ">
                                    <label>
                                       Male:<input type="radio" class="flat" name="gender" id="genderM" value="M" checked=""
                                               required/>
                                    </label>
                                    <label>
                                        Female:<input type="radio" class="flat" name="gender" id="genderF" value="F"/>
                                    </label>
                                    <label>
                                        Other:<input type="radio" class="flat" name="gender" id="genderO" value="O"/>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group item">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Select</label>
                            <div class="col-md-6 col-sm-6 col-form-label">
                                <select class="form-control">
                                    <option>Choose option</option>
                                    <option>Option one</option>
                                    <option>Option two</option>
                                    <option>Option three</option>
                                    <option>Option four</option>
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy"
                                       type="text" required="required" type="text" onfocus="this.type='date'"
                                       onmouseover="this.type='date'" onclick="this.type='date'"
                                       onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                <script>
                                    function timeFunctionLong(input) {
                                        setTimeout(function () {
                                            input.type = 'text';
                                        }, 60000);
                                    }
                                </script>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Article content <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <div class="x_content">
                                    <div id="alerts"></div>
                                    <div class="btn-toolbar editor" data-role="editor-toolbar"
                                         data-target="#editor-one">
                                        <div class="btn-group">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i
                                                    class="fa fa-font"></i><b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                            </ul>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i
                                                    class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a data-edit="fontSize 5">
                                                        <p style="font-size:17px">Huge</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-edit="fontSize 3">
                                                        <p style="font-size:14px">Normal</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-edit="fontSize 1">
                                                        <p style="font-size:11px">Small</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i
                                                    class="fa fa-bold"></i></a>
                                            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i
                                                    class="fa fa-italic"></i></a>
                                            <a class="btn" data-edit="strikethrough" title="Strikethrough"><i
                                                    class="fa fa-strikethrough"></i></a>
                                            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i
                                                    class="fa fa-underline"></i></a>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i
                                                    class="fa fa-list-ul"></i></a>
                                            <a class="btn" data-edit="insertorderedlist" title="Number list"><i
                                                    class="fa fa-list-ol"></i></a>
                                            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i
                                                    class="fa fa-dedent"></i></a>
                                            <a class="btn" data-edit="indent" title="Indent (Tab)"><i
                                                    class="fa fa-indent"></i></a>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i
                                                    class="fa fa-align-left"></i></a>
                                            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i
                                                    class="fa fa-align-center"></i></a>
                                            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i
                                                    class="fa fa-align-right"></i></a>
                                            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i
                                                    class="fa fa-align-justify"></i></a>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i
                                                    class="fa fa-link"></i></a>
                                            <div class="dropdown-menu input-append">
                                                <input class="span2" placeholder="URL" type="text"
                                                       data-edit="createLink"/>
                                                <button class="btn" type="button">Add</button>
                                            </div>
                                            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i
                                                    class="fa fa-cut"></i></a>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i
                                                    class="fa fa-picture-o"></i></a>
                                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn"
                                                   data-edit="insertImage"/>
                                        </div>

                                        <div class="btn-group">
                                            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i
                                                    class="fa fa-undo"></i></a>
                                            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i
                                                    class="fa fa-repeat"></i></a>
                                        </div>
                                    </div>

                                    <div id="editor-one" class="editor-wrapper"></div>
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
