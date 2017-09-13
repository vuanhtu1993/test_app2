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
                            <input type="text" class="form-control" id="name" name="name" ng-model="users.name" required ng-minlength="1" ng-maxlength="50" />
                            <span id="helpBlock2" class="help-block" ng-show="form_add.name.$error.required ">Name must be required!</span>
                            <span id="helpBlock2" class="help-block" ng-show="form_add.name.$error.minlength">Name must be in range 1 to 100!</span>
                            <span id="helpBlock2" class="help-block" ng-show="form_add.name.$error.maxlength">Name must be in range 1 to 100!</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Age</label>
                        <div class="col-sm-9">
                            {{--input name="song" ng-model="soundcloud.song.song" --}}
                            <input type="number" class="form-control" id="age" name="age"
                                   ng-model="users.age" ng-required="true" min="1" max="99" >
                            <span id="helpBlock2" class="help-block" ng-show="form_add.age.$error.required">Age must be required!</span>
                            <span id="helpBlock2" class="help-block" ng-show="form_add.age.$error.number">Not valid number!</span>
                            <span id="helpBlock2" class="help-block" ng-show="form_add.age.$error.min||form_add.age.$error.max">Age must be 2 digit!</span>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">

                            <textarea  class="form-control" id="address" name="address"
                                      ng-model="users.address" ng-required="true" ng-minlength="0" ng-maxlength="300"  > </textarea>
                            <span  class="help-block" ng-show="form_add.address.$error.required">Adress must be required!</span >
                            <span  class="help-block" ng-show="form_add.address.$error.minlength">Address must be in ranger 1 to 300 digit!</span>
                            <span  class="help-block" ng-show="form_add.address.$error.maxlength">Address must be in ranger 1 to 300 digit!</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-9">
                            <div class="row heightImage">
                                    <input style="border: none" type="file" ngf-select ng-model="users.image" name="image" ngf-max-size="10MB"
                                           ngf-model-invalid="errorFile" ngf-pattern="image/png,image/jpg,image/gif,image/jpeg"
                                           class="form-control upload" file-model="files" id="upload" ng-click="files = null" >
                                <img ng-show="form_app.files.$valid" ngf-thumbnail="users.image"
                                     class="img-thumbnail" id="imgThumbnail" width="100em" id="image">

                                <div style="margin-top: 18px"><span id="helpBlock2" class="help-block colorMessages" ng-show="form_add.image.$error.pattern">Image only support: png; jpg; jpeg; gif !</span></div>
                                <div style="margin-top: 18px"><span id="helpBlock2" class="help-block colorMessages" ng-show="form_add.image.$error.maxSize">File too large: max 10MB</span></div>
                            </div>
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button class="btn" ng-click="upload()" ng-disabled="form_add.$invalid"> Upload +</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->