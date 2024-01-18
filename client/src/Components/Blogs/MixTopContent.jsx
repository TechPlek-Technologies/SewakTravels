import { Link } from "react-router-dom";
import Img from "../Common/Img";

function MixTopContent({data}) {
  const desiredBlog = data[0];
console.log("desiredBlog",desiredBlog)

  function formatMySQLDate(mysqlDate) {
    const date = new Date(mysqlDate);
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('en-US', options);
  }

    return (
      <div className="row">
        <div className="col-12">
          <div className="blog-wrap">
            <div className="blog-image">
            <Link to={`/blogs/${desiredBlog?.blog_title.replace(/ /g, '-')}`}>
                <img width={"100%"}  src={"./ca_admin/assets/blogs/"+desiredBlog?.banner_image}  className="img-fluid" alt="" />
              </Link>
            </div>
            <div className="blog-details">
              <div>
                <h6>
                  <i className="fas fa-map-marker-alt"></i> Delhi, India {" "}
                  <i className="fas fa-clock ms-2"></i> {formatMySQLDate(desiredBlog?.creation_date)}
                </h6>
                <Link  to={`/blogs/${desiredBlog?.blog_title.replace(/ /g, '-')}`}>
                  <h5>{desiredBlog?.blog_title} </h5>
                </Link>
                <p>{desiredBlog?.short_description}</p>
                <h6 className="link">
                <Link to={`/blogs/${desiredBlog?.blog_title}`}>read more</Link>
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  };
  
  export default MixTopContent;