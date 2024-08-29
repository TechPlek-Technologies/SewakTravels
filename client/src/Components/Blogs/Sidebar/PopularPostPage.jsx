import { Link } from "react-router-dom";

const PopularPostPage = ({value}) => {

  function formatMySQLDate(mysqlDate) {
    const date = new Date(mysqlDate);
    const options = { year: 'numeric', month: 'numeric', day: 'numeric' };
    return date.toLocaleDateString('en-IN', options);
  }
  
    return (
      <div className="blog-wrapper">
        <div className="sidebar-title"> 
          <h5>{"Popular Post"}</h5>
        </div>
        <div className="sidebar-content">
          <ul className="blog-post">
            {value?.map((post, index) => ( 
             <Link to={`/blogs/${post.slug}`} key={index}>
               <li key={index} style={{"marginBottom": "20px"}}>
                <div className="media">
                  <img className="img-fluid" src={"../ca_admin/assets/blogs/"+post.banner_image} alt="Generic placeholder image" />
                  <div className="media-body align-self-center">
                    <div>
                      <h6>{formatMySQLDate(post.creation_date)}</h6>
                      <p>{post.blog_title}</p>
                    </div>
                  </div>
                </div> 
              </li>
             </Link>
            ))}
          </ul>
        </div>
      </div>
    );
  };

  export default PopularPostPage;