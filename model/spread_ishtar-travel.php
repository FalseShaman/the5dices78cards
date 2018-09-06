<?php 
    $rowCount = 5;
    $colCount = 4;
    $cardCount = 15;
    
    $divSize = intdiv(12, $rowCount);
    
    $spread = array(
        '������' => array('position' => 1),
        '����' => array('position' => 4),
        '�������' => array('position' => 8),
        '������ �������' => array('position' => 12),
        '�������� ��������' => array('position' => 16),
        '�����' => array('position' => 17),
        '������� ��������' => array('position' => 18),
        '����� � ��������' => array('position' => 19),
        '������ ������' => array('position' => 15),
        '����������' => array('position' => 11),
        '��������' => array('position' => 10),
        '����� ���' => array('position' => 13),
        '����� ����' => array('position' => 14),
        '����� ��������' => array('position' => 3),
        '������ ������' => array('position' => 7)
    );
    
    $map = '';
    for ($row=0; $row<$rowCount; $row++)
    {
        for ($col=0; $col<$colCount; $col++)
        {
            $placeNumber = $row + $row*$col;
            $map .= '<div class="col-md-'.$divSize.'" id="cardPlace'.$placeNumber.'">';
            
            $placeFound = false;
            foreach($spread as $place => $data)
            {
                if ($placeNumber == $data['position']) {
                    $map .= '<div class="card" style="width: 13rem;">
                                <img class="card-img-top" src="http://1001goroskop.ru/img/cards/koloda/56.jpg" width="170" height="300" alt="0">
                                <div class="card-body">
                                    <h5 class="card-title">'.$place.'</h5>
                                    <p class="card-text">...</p>
                                </div>
                            </div>';
                    
                    $placeFound = true;
                }
            }
            
            if (!$placeFound) {
                
            }
            
            $map .= '</div>';
        }
    }
?>
