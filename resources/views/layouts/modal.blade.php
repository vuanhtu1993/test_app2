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
                            <input type="text" class="form-control" id="name" name="name" ng-model="name" required ng-minlength="5" ng-maxlength="10" />
                            <span id="helpBlock2" class="help-block" ng-show="form_add.name.$error.required">Type name of song</span>
                            <span id="helpBlock2" class="help-block" ng-show="form_add.name.$error.minlength">min length</span>
                            <span id="helpBlock2" class="help-block" ng-show="form_add.name.$error.maxlength">max length</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Age</label>
                        <div class="col-sm-9">
                            {{--input name="song" ng-model="soundcloud.song.song" --}}
                            <input type="number" class="form-control" id="age" name="age"
                                   ng-model="age" ng-required="true" min="1" max="99" >
                            <span id="helpBlock2" class="help-block" ng-show="form_add.age.$error.required">Age is required!</span>
                            <span id="helpBlock2" class="help-block" ng-show="form_add.age.$error.number">Not valid number!</span>
                            <span id="helpBlock2" class="help-block" ng-show="form_add.age.$error.min||form_add.age.$error.max">Age must be 2 digit</span>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                            {{--input name="image" ng-model="soundcloud.song.image" --}}
                            <textarea  class="form-control" id="address" name="address"
                                      ng-model="address" ng-required="true" ng-minlength="0" ng-maxlength="300"  > </textarea>
                            <span  class="alert danger" ng-show="form_add.address.$error.required">Adress is required!</span >
                            <span  class="alert danger" ng-show="form_add.address.$error.minlength">Adress must be in ranger 1 to 300 digit</span>
                            <span  class="alert danger" ng-show="form_add.address.$error.maxlength">Adress must be in ranger 1 to 300 digit</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Type</label>
                        {{--select name="name" ng-model="soundcloud.song.name" --}}
                        <select  name="type" id="style-select" ng-model="soundcloud.song.type">
                            <option value="Pop">Pop</option>
                            <option value="Rap">Rap</option>
                            <option value="RnB">RnB</option>
                            <option value="Balad">Balad</option>
                            <option value="Country">Country</option>
                        </select>
                    </div>
                </form>
                <% soundcloud.song %>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" >Lưu</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->