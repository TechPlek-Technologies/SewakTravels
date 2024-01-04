import PopularPostPage from "./Sidebar/PopularPostPage";

function Sidebar({value}){
    return (
      <div className="sticky-cls-top">
        <div className="blog-sidebar">
          <div className="blog-wrapper">
            <div className="search-bar">
              <input type="text" placeholder="Search here.." />
              <i className="fas fa-search"></i>
            </div>
          </div>
          <PopularPostPage value={value} />
          {/* <PopularTagPage /> */}
        </div>
      </div>
    );
  };
  
  export default Sidebar;