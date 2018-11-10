<?php 

    prevent_d_access(); 

    /**
    * Templates are used only if the key `use_temp => true` in the route file
    * it uses the same structure as the theme. Fragments can be placed in the
    * Fragments folder of this template dir and can be loaded with `load_fragment('file_name_stored_in_fragments_folder')`
    * BY default `load_fragments` searches for files in the specified view folder. It can be passed second param
    * 'theme' or 'themes' to search for the fragment file in the themes fragments folder
    * 
    * While using templates, files for the main dynamic content are searched for in the pages folder
    * It is now like 
    * --> Load themes --> load templates --> load page

    * @const route_file string This holds refernce to the routes main content file loaded from the pages folder
    */

?> 


<div class="ministry">
    <div class="row masthead">
    	<?php load_fragment('page.masthead') ?>
	</div>


    <div class="row content">
        <div class="container">
            <div class="row">
                <div class="col s12 m8 main-content">
                    <?php  include_once route_file ?>
                </div>

                <div class="col s12 m4 sidebar">
                    <?php load_fragment('page.sidebar') ?>
                </div>

            </div>
        </div>
    </div>
</div>