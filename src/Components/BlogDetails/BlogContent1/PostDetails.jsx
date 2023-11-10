import { Link } from "react-router-dom";

function PostDetail({data}) {
    return (
      <div className="title-part">
        <ul className="post-detail">
          <li>{data.date}</li>
          <li>Posted By : {data.author}</li>
          <li>
            <i className="fa fa-heart"></i> {data.like_count} Hits
          </li>
          <li>
            <i className="fa fa-comments"></i> {data.comment_count} Comment
          </li>
        </ul>
        <Link href="/pages/blog-pages/left-sidebar"><h3>{data.desc}</h3></Link>
      </div>
    );
  };
  
  export default PostDetail;