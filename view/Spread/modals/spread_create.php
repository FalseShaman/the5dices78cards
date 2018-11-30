<?php
    $modals .= '<div class="modal fade" id="spreadCreator" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content createSpreadModal">
                                        <div class="modal-body">
                                            <button type="button" class="close modalClose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <form class="createSpreadForm"> 
                                                <div class="col-md-12">
                                                    <div class="titleInput">
                                                        <label for="spreadTitle">Название:</label>
                                                        <input type="text" class="form-control" id="spreadTitle">
                                                    </div>
                                                    <div class="numberInput">
                                                        <label for="spreadLength">Длина:</label>
                                                        <input type="number" class="form-control" id="spreadLength">
                                                    </div>
                                                    <div class="numberInput">
                                                        <label for="spreadHeight">Высота:</label>
                                                        <input type="number" class="form-control" id="spreadHeight">
                                                    </div>
                                                </div> 
                                                <div class="col-md-12">
                                                    <div class="textInput">
                                                        <label for="spreadSpecification">Назначение:</label>
                                                        <textarea class="form-control" id="spreadSpecification"></textarea>                    
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="textInput">
                                                        <label for="spreadHistory">История:</label>
                                                        <textarea class="form-control" id="spreadHistory"></textarea>                    
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="form-control btn btn-info" id="spreadSave">Сохранить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';