import PopularPostPage from "./Sidebar/PopularPostPage";

function Sidebar({value}){
    return (
      <div className="sticky-cls-top">
        <div className="blog-sidebar">
          <div className="blog-wrapper">
          
          </div>
          <PopularPostPage value={value} />
        </div>
      </div>
    );
  };
  
  export default Sidebar;