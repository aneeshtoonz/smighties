<div class="page-wrapper">

      <div class="container-fluidic container-tv-header">

          <div class="container">

              <?php $this->load->view('site/includes/menu');?>

              <div class="clearfix"></div>

              <div class="page-title">
                <h1 class="grd-txt"
                data-min-width-320='Meet the Smighties'
                data-min-width-481='Meet the Smighties and Villains'
                data-min-width-961='Meet the Smighties and Villains'>Meet the Smighties and Villains</h1>
                <h2 class="visible-lg visible-md">Know your Smighties and villains</h2>
              </div>

              <div class="clearfix"></div>

              <div class="menu-tabs pull-left visible-lg">

                  <a href="<?php echo HOST_URL?>/smightypedia" class="active">
                    <span class="left"></span>
                    <span class="middle">Smighties</span>
                    <span class="right"></span>
                  </a>
                  <a href="<?php echo HOST_URL?>/villains">Villians</a>

              </div>

              <div class="search-filter pull-right">

                  <button
                  data-toggle="modal"
                  data-target="#filterModal"
                  class="button-search"
                  data-min-width-320='<i class="ion-ios-search-strong"></i> Search'
                  data-min-width-481='<i class="ion-ios-search-strong"></i> Search'
                  data-min-width-961='<i class="ion-ios-search-strong"></i> Search'>
                      <i class="ion-ios-search-strong"></i> Search
                  </button>

                  <button class="button-goodies"
                  onclick="window.location.href='<?php echo HOST_URL?>/downloads/wallpapers'"
                  data-min-width-320='<i class="ion-arrow-down-c"></i> My Goodies'
                  data-min-width-481='<i class="ion-arrow-down-c"></i> My Goodies'
                  data-min-width-961='<i class="ion-arrow-down-c"></i> Get your goodies'>
                      <i class="ion-arrow-down-c"></i> Get your goodies
                  </button>

              </div>

              <div class="clearfix"></div>

              <div class="sort-order visible-lg">

                <div class="dropdown">
                  <button id="dLabel" type="button" class="sort-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Region: All <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dLabel">
                    <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, '', document.getElementById('rarity_tmp').value); $(this).parent().parent().parent().find('button').html('Region: All <span class=caret></span>');">All</a></li>
                    <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, 'Air', document.getElementById('rarity_tmp').value); $(this).parent().parent().parent().find('button').html('Region: Air <span class=caret></span>');">Air</a></li>
                    <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, 'Earth', document.getElementById('rarity_tmp').value); $(this).parent().parent().parent().find('button').html('Region: Earth <span class=caret></span>');">Earth</a></li>
                    <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, 'Water', document.getElementById('rarity_tmp').value); $(this).parent().parent().parent().find('button').html('Region: Water <span class=caret></span>');">Water</a></li>
                    <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, 'Light', document.getElementById('rarity_tmp').value); $(this).parent().parent().parent().find('button').html('Region: Light <span class=caret></span>');">Light</a></li>
                    <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, 'Magic', document.getElementById('rarity_tmp').value); $(this).parent().parent().parent().find('button').html('Region: Magic <span class=caret></span>');">Magic</a></li>

                  </ul>
                </div>

                <div class="dropdown last">
                  <button id="dLabel" type="button" class="sort-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Rarity: Any <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dLabel">
                    <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, document.getElementById('element_tmp').value, ''); $(this).parent().parent().parent().find('button').html('Rarity: Any <span class=caret></span>');">Any</a></li>
                    <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, document.getElementById('element_tmp').value, 'Super Duper Rare'); $(this).parent().parent().parent().find('button').html('Rarity: Super Duper Rare <span class=caret></span>');">Super Duper Rare</a></li>
                    <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, document.getElementById('element_tmp').value, 'Super Rare'); $(this).parent().parent().parent().find('button').html('Rarity: Super Rare <span class=caret></span>');">Super Rare</a></li>
                    <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, document.getElementById('element_tmp').value, 'Very Rare'); $(this).parent().parent().parent().find('button').html('Rarity: Very Rare <span class=caret></span>');">Very Rare</a></li>
                    <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, document.getElementById('element_tmp').value, 'Rare'); $(this).parent().parent().parent().find('button').html('Rarity: Rare <span class=caret></span>');">Rare</a></li>
                    <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, document.getElementById('element_tmp').value, 'Limited'); $(this).parent().parent().parent().find('button').html('Rarity: Limited <span class=caret></span>');">Limited</a></li>
                  </ul>
                </div>

              </div>

              <div class="sort-order sort-order-sm visible-xs visible-sm visible-md">

                <div class="row">

                  <div class="col-xs-6">
                    <div class="dropdown">
                      <button id="dLabel" type="button" class="sort-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Region: All <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, '', document.getElementById('rarity_tmp').value); $(this).parent().parent().parent().find('button').html('Region: All <span class=caret></span>');">All</a></li>
                        <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, 'Air', document.getElementById('rarity_tmp').value); $(this).parent().parent().parent().find('button').html('Region: Air <span class=caret></span>');">Air</a></li>
                        <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, 'Earth', document.getElementById('rarity_tmp').value); $(this).parent().parent().parent().find('button').html('Region: Earth <span class=caret></span>');">Earth</a></li>
                        <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, 'Water', document.getElementById('rarity_tmp').value); $(this).parent().parent().parent().find('button').html('Region: Water <span class=caret></span>');">Water</a></li>
                        <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, 'Light', document.getElementById('rarity_tmp').value); $(this).parent().parent().parent().find('button').html('Region: Light <span class=caret></span>');">Light</a></li>
                        <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, 'Magic', document.getElementById('rarity_tmp').value); $(this).parent().parent().parent().find('button').html('Region: Magic <span class=caret></span>');">Magic</a></li>

                      </ul>
                    </div>
                  </div>

                  <div class="col-xs-6">
                    <div class="dropdown">
                      <button id="dLabel" type="button" class="sort-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Rarity: Any <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, document.getElementById('element_tmp').value, ''); $(this).parent().parent().parent().find('button').html('Rarity: Any <span class=caret></span>');">Any</a></li>
                        <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, document.getElementById('element_tmp').value, 'Super Duper Rare'); $(this).parent().parent().parent().find('button').html('Rarity: Super Duper Rare <span class=caret></span>');">Super Duper Rare</a></li>
                        <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, document.getElementById('element_tmp').value, 'Super Rare'); $(this).parent().parent().parent().find('button').html('Rarity: Super Rare <span class=caret></span>');">Super Rare</a></li>
                        <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, document.getElementById('element_tmp').value, 'Very Rare'); $(this).parent().parent().parent().find('button').html('Rarity: Very Rare <span class=caret></span>');">Very Rare</a></li>
                        <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, document.getElementById('element_tmp').value, 'Rare'); $(this).parent().parent().parent().find('button').html('Rarity: Rare <span class=caret></span>');">Rare</a></li>
                        <li><a href="#" onclick="javascript: load__smlists(document.getElementById('name_no_tmp').value, document.getElementById('element_tmp').value, 'Limited'); $(this).parent().parent().parent().find('button').html('Rarity: Limited <span class=caret></span>');">Limited</a></li>
                      </ul>
                    </div>
                  </div>

                </div>

              </div>

              <input type="hidden" name="name_no_tmp" id="name_no_tmp" />
              <input type="hidden" name="element_tmp" id="element_tmp" />
              <input type="hidden" name="rarity_tmp" id="rarity_tmp" />

              <div class="clearfix"></div>

              <div class="video-load-container">

                <div class="block">
                    <div class="row" id="sm-loader">
                         <div class="sm-loading"></div>
                    </div>
                </div>

                <script type="text/javascript">

                    $(function() {

                        // Null loader for lists
                        load__smlists('','');

                        // Submit filter action button
                        var submit__filter = $('#filter-submit');
                        submit__filter.on('click', function(e){

                            e.preventDefault();
                            var name_no = $('#name_no').val(), element = $('#element').val();

                            // Call to laoder
                            load__smlists(name_no, element, '');
                            // return false;
                        });

                    });

                    // Load sm details container
                    function load__smlists(name_no = '', element = '', rarity = '') {
                       var smvid__loader = $('#sm-loader');

                       $("#name_no_tmp").val(name_no);
                       $("#element_tmp").val(element);
                       $("#rarity_tmp").val(rarity);

                       smvid__loader.html('<div class="sm-loading"></div>');
                       smvid__loader.load('<?php echo HOST_URL?>/async/smighties?name_no=' + name_no + '&element=' + element + '&rarity=' + encodeURI(rarity), function(d){ });
                       return false;
                    }

                </script>

              </div>

              <div class="clearfix"></div>

          </div>

      </div>

      <?php $this->load->view('site/includes/footer-sm');?>

    </div>

    <script type="text/javascript">

        $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });

    </script>

    <!-- Modal-->
    <div class="modal animated rubberBand fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModal">
      <div class="modal-dialog" role="document">

          <div class="modal-content profile-modal">
                <div class="sm-loading"></div>
          </div>

      </div>
    </div>

    <!-- Modal-->
    <div class="modal animated rubberBand fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog filter-modal" role="document">

          <button type="button" class="button-close" data-dismiss="modal" aria-label="Close">
            <i class="ion-close-round"></i>
          </button>

          <div class="filter col-lg-12">

              <h2 class="text-left">Search Filter</h2>

              <form action="" name="filter" id="filter">

                  <div class="filter-form-label">
                      <label>Name / Number</label>
                      <input type="text" name="name_no" id="name_no" placeholder="" class="filter-form-control"/>
                  </div>

                  <div class="filter-form-label">
                      <label>Element</label>
                      <select name="element" id="element" class="filter-form-control">
                            <option value="">Choose</option>
                            <option value="Air">Air</option>
                            <option value="Water">Water</option>
                            <option value="Earth">Earth</option>
                            <option value="Light">Light</option>
                            <option value="Magic">Magic</option>
                      </select>
                  </div>

                  <button type="button" class="button-bubble" id="filter-submit" data-dismiss="modal" aria-label="Close">
                      <span class="left"></span>
                      <span class="middle">Filter search</span>
                      <span class="right"></span>
                  </button>

                  <div class="clearfix"></div>

              </form>

              <div class="clearfix"></div>

          </div>

          <div class="clearfix"></div>

      </div>

    </div>
