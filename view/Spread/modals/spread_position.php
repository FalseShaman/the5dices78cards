<?php 
    $positionSelectModal = '<div class="modal fade" id="positionSelector" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content spreadPositionModal">
                                        <div class="modal-body">
                                            <button type="button" class="close modalClose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <form class="createPositionForm"> 
                                                <div class="nameInput">
                                                    <label for="positionName">Имя:</label>
                                                    <input type="text" class="form-control" id="positionName">
                                                </div>
                                                <div class="numberInput">
                                                    <label for="positionNumber">Номер:</label>
                                                    <input type="number" class="form-control" id="positionNumber">
                                                </div>
                                                <div class="textInput">
                                                    <label for="positionDescription">Собственное значение позиции:</label>
                                                    <textarea class="form-control" id="positionDescription"></textarea>                    
                                                </div>
                                                <div class="textInput">
                                                    <label for="positionLink">Связи с позициями в раскладе:</label>
                                                    <textarea class="form-control" id="positionLink"></textarea>                    
                                                </div>
                                                <div class="textInput">
                                                    <label for="positionCard">Советы по чтению карты:</label>
                                                    <textarea class="form-control" id="positionCard"></textarea>                    
                                                </div>
                                                <div class="textInput">
                                                    <label for="positionFrame">Пример чтения:</label>
                                                    <textarea class="form-control" id="positionFrame"></textarea>                    
                                                </div>
                                            </form> 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="form-control btn btn-info" id="positionSave">Ок</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';