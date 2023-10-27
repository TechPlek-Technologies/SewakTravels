import { commentsData } from "../../../Data/CommentData";
import Img from "../../Common/Img";

function CommentContent({data}){
    return (
      <div className="comment-section">
        <h4 className="comment">comments:</h4>
        <div className="comment-wrapper">
          <div className="comment-box">
            {data?.comments.map((comment,index) => (
              <div className="media" key={index}>
                <Img src={comment.avatar} className="img-fluid" alt="" />
                <div className="media-body">
                  <div className="title">
                    <div className="comment-user">
                      <i className="fa fa-user"></i>
                      <h6>{comment.name}</h6>
                    </div>
                    <div className="comment-date">
                      <i className="fas fa-clock"></i>
                      <h6>{comment.date}</h6>
                    </div>
                  </div>
                  <div className="comment-detail">
                    <p>{comment.content}</p>
                  </div>
                  
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    );
  };
  
  export default CommentContent;