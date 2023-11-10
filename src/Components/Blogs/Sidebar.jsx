import PopularPostPage from "./Sidebar/PopularPostPage";
import PopularTagPage from "./Sidebar/PopularTagPage";

function Sidebar(){
    return (
      <div className="sticky-cls-top">
        <div className="blog-sidebar">
          <div className="blog-wrapper">
            <div className="search-bar">
              <input type="text" placeholder="Search here.." />
              <i className="fas fa-search"></i>
            </div>
          </div>
          <PopularPostPage />
          <PopularTagPage />
        </div>
      </div>
    );
  };
  
  export default Sidebar;