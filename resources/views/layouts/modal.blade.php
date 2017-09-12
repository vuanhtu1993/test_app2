<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Adding User</h4>
            </div>
            <div class="modal-body">
                <form name="form_add" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            {{--input name="name" ng-model="soundcloud.song.name" --}}
                            <input ng-init="users.name=10" type="text" class="form-control" id="name" name="name" ng-model="users.name" required ng-minlength="1" ng-maxlength="50" />
                            <span id="helpBlock2" class="help-block" ng-show="form_add.name.$error.required">Name must be required</span>
                            <span id="helpBlock2" class="help-block" ng-show="form_add.name.$error.minlength">Name must be in range 1 to 100</span>
                            <span id="helpBlock2" class="help-block" ng-show="form_add.name.$error.maxlength">Name must be in range 1 to 100</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Age</label>
                        <div class="col-sm-9">
                            {{--input name="song" ng-model="soundcloud.song.song" --}}
                            <input type="number" ng-init="users.age=12" class="form-control" id="age" name="age"
                                   ng-model="users.age" ng-required="true" min="1" max="99" >
                            <span id="helpBlock2" class="help-block" ng-show="form_add.age.$error.required">Age is required!</span>
                            <span id="helpBlock2" class="help-block" ng-show="form_add.age.$error.number">Not valid number!</span>
                            <span id="helpBlock2" class="help-block" ng-show="form_add.age.$error.min||form_add.age.$error.max">Age must be 2 digit</span>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">

                            <textarea ng-init="users.address='dasds'" class="form-control" id="address" name="address"
                                      ng-model="users.address" ng-required="true" ng-minlength="0" ng-maxlength="300"  >dasd </textarea>
                            <span  class="alert danger" ng-show="form_add.address.$error.required">Adress must be required!</span >
                            <span  class="alert danger" ng-show="form_add.address.$error.minlength">Address must be in ranger 1 to 300 digit</span>
                            <span  class="alert danger" ng-show="form_add.address.$error.maxlength">Address must be in ranger 1 to 300 digit</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-9">
                        <input type='file' onchange="readURL(this);" ng-model="users.images" multiple ng-files="getTheFiles($files)" required  />
                        <img id="blah" src="#" alt="your image" />

                        </div>
                    </div>
                </form>
               <% users %>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" ng-click="uploadFiles()" >Lưu</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->