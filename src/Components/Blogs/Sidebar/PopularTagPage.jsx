import { popularTags } from "../../../Data/BlogData";

const PopularTagpage= () => {
   
  
    return (
      <div className="blog-wrapper">
        <div className="sidebar-title">
          <h5>{"Popular Tags"}</h5>
        </div>
        <div className="sidebar-content">
          <ul className="tags">
            {popularTags.map((tag, index) => (
              <li key={index}>
                <a href="#">{tag}</a>
              </li>
            ))}
          </ul>
        </div>
      </div>
    );
  };
  
  export default PopularTagpage;