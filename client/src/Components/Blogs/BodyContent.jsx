import { Link } from "react-router-dom";
import Img from "../Common/Img";

const BodyContent= ({ data, view }) => {

  function formatMySQLDate(mysqlDate) {
    const date = new Date(mysqlDate);
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('en-US', options);
  }
  

  function formatMySQLDateMonth(mysqlDate) {
    const date = new Date(mysqlDate);
    const options = { month: 'long', day: 'numeric' };
    return date.toLocaleDateString('en-US', options);
  }
  
    return (
      <>
        <div className={`blog-wrap wow fadeInUp`}>
          <div className={`blog-image ${view === "creative" ? (data.id % 2 === 0 ? "order-md-1" : "") : ""}`}>
            <Img src={"./ca_admin/assets/blogs/"+data.banner_image} className=" bg-img" alt="" />
            <div className={`blog-label`}>
              <div>
                <h3>{data.date}</h3>
                <h6>{formatMySQLDateMonth(data.creation_date)}</h6>
              </div>
            </div>
          </div>
          <div className="blog-details">
            <div>
              <h6>
                <i className={`fas fa-map-marker-alt`}></i>
                {"Delhi, India  "}
                {view === "creative" && <i className="fas fa-clock ms-2"> {formatMySQLDate(data.creation_date)}</i>}
              </h6>
              <Link to={`/blogs/${data.id}`}>
                <h5>{data.blog_title}</h5>
              </Link>
              <p>{data.short_description}</p>
              {view === "creative" && "list" && (
                <h6 className="link">
                  <Link to={`/blogs/${data.id}`}>read more</Link>
                </h6>
              )}
            </div>
          </div>
        </div>
      </>
    );
  };
  
  export default BodyContent;