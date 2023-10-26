import Sidebar from "../../Blogs/Sidebar";
import Img from "../../Common/Img";
import CommentContent from "./CommentContent";
import DetailPart from "./DetailPart";
import PostDetail from "./PostDetails";

function BodyContent ({ side,data}) {
    return (
      <section className="section-b-space bg-white">
        <div className="container">
          <div className="row">
            {side !== "no" && (
              <div className={`col-lg-3`}>
                <Sidebar />
              </div>
            )}
            <div className={"col-lg-9"}>
              <div className="blog-single-detail">
                <div className="top-image">{<Img src="/assets/images/portfolio/13.jpg" alt="" className="img-fluid " />}</div>
                <PostDetail data={data}/>
                <DetailPart data={data}/>
                <CommentContent />
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  };
  
  export default BodyContent;