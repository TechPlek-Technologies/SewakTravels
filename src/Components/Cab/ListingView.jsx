import CabListProducts from "./CabListProducts";
import SidebarFilter from "./SidebarFilter";

function ListingView(){
    return(
        <section class="pt-0 bg-inner small-section">
        <div class="container">
            <div class="row">
                <SidebarFilter/>
                <div class="col-lg-9">
                    
                    <CabListProducts/>
                 
                </div>
            </div>
        </div>
    </section>
    )
}

export default ListingView;
