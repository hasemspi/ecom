<div class="header-search-bar layout-01">
                            <form action="#" class="form-search" name="desktop-seacrh" method="get">
                                <input type="text" name="s" class="input-text" value="" placeholder="Search here...">
                                <select name="category">
                                    <option value="-1" selected>All Categories</option>
                                    <?php
                            foreach ($product as $rows){
                            ?>
                                    <option value="vegetables"><?php echo $rows['Cat_Name'];?></option>
                                    <?php } ?>
                                   
                                </select>
                                <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>