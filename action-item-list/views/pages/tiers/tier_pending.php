<h1 class="h3 mb-4 text-gray-800">Pending Tier Issues</h1>

<div style="margin-bottom:15px;">
    
</div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
    </div>
        <div class="card-body">
            <div style="margin-top:-20px;" class="table-responsive">
            <table  style="font-size: 14px; vertical-align:middle; " class="table  order-column " id="dataTableExcel" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th style="text-align: center;">Tier</th>
                    <th style="text-align: center;">Plant</th>
                    <th style="text-align: center;">Area</th>
                    <th style="text-align: center;">Issue</th>
                    <th style="width: 100px;text-align: center;">Actions</th>                    
                </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tier_triggers 
                    LEFT JOIN tiers ON tiers.tier_id = tier_triggers.trigger_tier_id 
                    LEFT JOIN plants ON tiers.tier_plant = plants.plant_id 
                    LEFT JOIN tier_area ON tier_area.tier_id = tiers.tier_id 
                    WHERE trigger_complete = 0 GROUP BY tier_triggers.trigger_id";
                    

                    $result = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_array($result)):
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $row['tier_name']; ?></td>
                            <td style="text-align: center;"><?php echo $row['plant_name'];  ?></td>
                            <td style="text-align: center;"><?php if($row['area_name'] == ""){echo "N/A";}else{echo $row['area_name'];}  ?> <?php if($row['area_ident'] == ""){echo "N/A";}else{echo $row['area_ident'];} ?></td>
                            <td style="text-align: center;"><?php echo $row['trigger_issue']; ?></td>

                            <td>
                                <a href='index.php?page=tier_view&tier_id=<?php echo $row[0]?><?php if($row['area_id'] != ""){echo "&area_id={$row['area_id']}";}else{echo "";} ?>'  class='' ><i data-toggle='tooltip' data-placement='left' title='View Details' style='font-size: 20px; color:#b5b5b5' class='far fa-eye options'></i></a>
                            </td>

                        </tr>
                    <?php endwhile; ?>
                </tbody>                
            </table>
        </div>
    </div>
</div>




