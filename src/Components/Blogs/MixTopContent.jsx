import { Link } from "react-router-dom";
import Img from "../Common/Img";

function MixTopContent({data}) {

  const desiredBlog = data.find(blog => blog.id === 1);

    return (
      <div className="row">
        <div className="col-12">
          <div className="blog-wrap">
            <div className="blog-image">
            <Link to={`/blogs/id=${data[1].id}`}>
                <Img src="/assets/images/portfolio/13.jpg" className="img-fluid" alt="" />
              </Link>
            </div>
            <div className="blog-details">
              <div>
                <h6>
                  <i className="fas fa-map-marker-alt"></i> phonics, newyork
                  <i className="fas fa-clock ms-2"></i> 20 april, 2023
                </h6>
                <Link to={`/blogs/id=${data[1].id}`}>
                  <h5>Twice profit than before you. </h5>
                </Link>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text...</p>
                <h6 className="link">
                <Link to={`/blogs/id=${data[1].id}`}>read more</Link>
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  };
  
  export default MixTopContent;