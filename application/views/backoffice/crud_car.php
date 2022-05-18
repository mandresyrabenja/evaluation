<hr>
<ul class="nav justify-content-center" id="crud_title">
  <li class="nav-item">
        <a class="nav-link h4" href="<?php echo site_url('experience');?>">Expérience</a>
  </li>
</ul>
<hr>
  <div id="app">
   <div class="container">
    <div class="row">
        <transition
                enter-active-class="animated fadeInLeft"
                     leave-active-class="animated fadeOutRight">
                     <div class="notification is-success text-center px-5 top-middle" v-if="successMSG" @click="successMSG = false">{{successMSG}}</div>
            </transition>
        <div class="col-md-12">
           <table class="table my-3" id="menu_header">
               <tr>
                   <td> <button class="btn btn-default btn-block" @click="addModal= true">Ajouter</button></td>
                   <td><input placeholder="Rechercher..." type="search" class="form-control" v-model="search.text" @keyup="searchProduct" name="search"></td>
               </tr>
           </table>
            <table class="table is-bordered is-hoverable">
               <thead id="table_head" class="text-white" >
                
                <th class="text-white">ID</th>
                <th class="text-white">Nom</th>
                <th class="text-white">Catégorie</th>
                <th class="text-white">Description</th>
                <th class="text-white">Chauffeur</th>
                <th class="text-white">Max des voyageurs</th>
                <th class="text-white">Premier guide</th>
                <th class="text-white">Deuxième guide</th>
                <th colspan="2" class="text-center text-white">Action</th>
                </thead>
                <tbody class="table-light">
                    <tr v-for="produit in produits" class="table-default">
                        <td>{{produit.experience_id}}</td>
                        <td>{{produit.name}}</td>
                        <td>{{produit.category}}</td>
                        <td>{{produit.description | limit100}}...</td>
                        <td>{{produit.driver}}</td>
                        <td>{{produit.max_traveler}}</td>
                        <td>{{produit.guide1}}</td>
                        <td>{{produit.guide2}}</td>
                        <td><button class="btn btn-info fa fa-edit" @click="editModal = true; selectProduct(produit)"></button></td>
                        <td><button class="btn btn-danger fa fa-trash" @click="deleteModal = true; selectProduct(produit)"></button></td>
                    </tr>
                    <tr v-if="emptyResult">
                      <td colspan="10" rowspan="4" class="text-center h1">Aucun produit trouvés</td>
                  </tr>
                </tbody>
                
            </table>
            
        </div>
  
    </div>
     <pagination
        :current_page="currentPage"
        :row_count_page="rowCountPage"
         @page-update="pageUpdate"
         :total_users="totalProduits"
         :page_range="pageRange"
         >
      </pagination>
</div>
<?php include 'modal.php';?>

</div>

