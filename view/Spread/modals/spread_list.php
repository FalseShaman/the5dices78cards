<?php
    $list = '<ul class="list-group spreadList">';
    if ($spreadList && is_array($spreadList)) {
	    foreach ($spreadList as $spreadLi)
	    {
	        $list .= '<li class="list-group-item">
	                    <button class="btn btn-default openSpread" data-id="'.$spreadLi['id'].'">'.$spreadLi['title'].'</button>
	                </li>';
	    }
	    $list .= '</ul>';
	}

    $content .= '<div class="modal fade" id="spreadSelector" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content spreadListModal">
                                        <div class="modal-body">
                                            <button type="button" class="close modalClose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            '.$list.'
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>';