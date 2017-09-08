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
                <form name="form" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            {{--input name="name" ng-model="soundcloud.song.name" --}}
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Type name of song" ng-model="soundcloud.song.name" ng-required="true"/>
                            <span id="helpBlock2" class="help-block" ng-show="formAddsong.name.$error.required">Type name of song</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Link song</label>
                        <div class="col-sm-9">
                            {{--input name="song" ng-model="soundcloud.song.song" --}}
                            <input type="text" class="form-control" id="age" name="link_music"
                                   placeholder="http://" ng-model="soundcloud.song.link_music" ng-required="true">
                            <span id="helpBlock2" class="help-block" ng-show="formAddsong.link_music.$error.required">Link of song</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-9">
                            {{--input name="image" ng-model="soundcloud.song.image" --}}
                            <input type="text" class="form-control" id="email" name="link_img"
                                   placeholder="http://" ng-model="soundcloud.song.link_img" ng-required="true"/>
                            <span id="helpBlock2" class="help-block" ng-show="formAddsong.link_img.$error.required">Link image of song</span>
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
                <button type="button" class="btn btn-primary" ng-click="soundcloud.save()">Lưu</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->