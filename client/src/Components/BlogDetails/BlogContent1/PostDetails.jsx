import { Link } from "react-router-dom";
import Img from "../../Common/Img";

function PostDetail({ data }) {
  function formatMySQLDate(mysqlDate) {
    const date = new Date(mysqlDate);
    const options = { year: "numeric", month: "long", day: "numeric" };
    return date.toLocaleDateString("en-US", options);
  }
  return (
    <>
     <img
        src={"../ca_admin/assets/blogs/" + data.banner_image}
        className="bg-img"
        alt="Banner Img"
        width={"100%"}
      />
    <div className="title-part">
     

     <ul className="post-detail">
       <li>{formatMySQLDate(data.creation_date)}</li>
       <li>Posted By : {data.created_by}</li>
     </ul>
     <h3>{data.blog_title}</h3>
   </div>
    </>
  );
}

export default PostDetail;
