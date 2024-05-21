
<?php
    $ttrow =  $rackInfo;
    //$building_id    = $rackInfo->building_id;
    //$floor_id       = $ttrow->building_name;
    //$floor_id       = $rackInfo->floor_id;
    $rack_name      = $rackInfo['rackName'];
    $rack_id        = $rackInfo['rack_id'];
    $row            = $rackInfo['rows'];
    $col            = $rackInfo['cols'];
    $levels         = $rackInfo['levels'];
    $dtrow = $row;
    $booked_seats=array();
    $booked_seats = $ro_own;
    $height = intval($row)*intval($levels)*42+28;
    $width = intval($col)*36+15;
    $n = 1; $j = 0; $slotNo = 0; $seatNo = 0;
    $row_limit = $row; $col_limit = $col; $shelf = 1;
?>

<div class="w-1/2 md:w-1/2 p-3">
    <div class="bg-orange-100 border border-gray-800 rounded shadow">
        <div class="border-b border-gray-800 p-3">
            <h5 class="font-bold uppercase text-gray-900">Layout</h5>
        </div>
        <div class="w-full p-5">
            <label class="block text-gray-900 text-sm font-bold mt-1 mb-2" for="end date">
                Layout Information
            </label>
            <table class='table-auto mx-auto w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
      				<thead class="bg-gray-900">
      					<tr class="text-white text-left">
      						<th class="font-semibold text-sm uppercase px-6 py-2"> Item </th>
      						<th class="font-semibold text-sm uppercase px-6 py-2"> Details </th>
      					</tr>
      				</thead>
                <tbody>
                    <tr class="border-b bg-purple-100 border-purple-200">
                        <td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap"> Cage Id </td>
                        <td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap"> {{ $cage_id }} </td>
                    </tr>
                    <tr class="border-b bg-indigo-100 border-indigo-200">
                        <td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap"> Building </td>
                        <td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap"> XYZ Building </td>
                    </tr>
                    <tr class="border-b bg-indigo-100 border-indigo-200">
                        <td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap"> Room </td>
                        <td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap"> ABC Room </td>
                    </tr>
                    <tr class="border-b bg-indigo-100 border-indigo-200">
                        <td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap"> Rack Name </td>
                        <td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ $rack_name }} </td>
                    </tr>
                    <tr class="border-b bg-green-100 border-green-200">
                        <td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap"> Marked Cages </td>
                        <td class="text-sm text-gray-900 font-medium px-3 py-1 whitespace-nowrap">{{ $markedCages }}</td>
                    </tr>
                </tbody>
            </table>

<?php

for($k = 0; $k < $levels; $k++)
{
    $shelf = $k +1;
    echo '<table class="p-1 mt-2 text-xs font-normal" align="center">';
    echo "</br>";
    for($i = 0; $i < $row_limit; $i++)
    {
?>
        <table class="flex mb-2">
            <thead>
            </thead>
            <tbody>
            <tr>
                <td class="text-gray-900 text-sm font-normal mx-2 p-1">
                    S#<?php echo $shelf?>
                </td>
<?php
                for($j = 0; $j < $col_limit; $j++)
                {
                    $seatNo = $j + $slotNo;
?>
                  <td class="text-yellow-200 text-sm font-normal mx-4 ">
<?php
                  $row = $rackInfo[$seatNo];
                  if( $row['status'] == 'O' )
                  {

?>

                    <span wire:click="markCages('{{ $row['cage_id'] }}')" >

                        <x-button class="btn min-w-15 btn-sm text-sm bg-green-800 text-gray-200 p-1 bg-green-800" data-toggle="popover" title="Cage ID: <?php echo $row['cage_id']; ?>" data-trigger="hover" data-content="Cage ID: <?php echo $row['cage_id']; ?>" >

                            <i class="fa fa-square" aria-hidden="true"></i>
                         <?php echo sprintf("%02d", $row['slot_id'] ); ?>
                        </x-button>
                    </span>
<?php               } else {  ?>
                    <span>
                        <x-button class="btn min-w-15 btn-sm text-sm bg-orange-700 text-gray-200 p-1" data-toggle="popover" title="Occupied/Other's Cage" data-trigger="hover" data-content="Other's Cage" >
                            <i class="fa fa-square" aria-hidden="false"></i>
                        <?php echo sprintf("%02d", $row['slot_id'] ); ?>
                        </x-button>
                    </span>
<?php           }
                //echo $seatNo;
                echo "</td>";
            }
            echo "</tr>";
            $slotNo = $slotNo +  $col_limit;
    }
    }
    echo "</table>";
?>

                    <tr>
                    </tr>
                    <tr >
                        <td align="center">
                        </br>
                        <button wire:click="terminateCages()" class="bg-blue-500 hover:bg-blue-700 text-white font-normal py-1 px-1 rounded">
                        Terminate Marked Cages
                        </button>

                        <button wire:click="clearMarkedCages()" class="bg-orange-500 hover:bg-orange-700 text-white font-normal mx-10 py-1 px-1 rounded">
                        Clear Selection
                        </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- / End of Left Panel Graph Card-->
