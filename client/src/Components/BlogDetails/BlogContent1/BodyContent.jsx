import Sidebar from "../../Blogs/Sidebar";
import Img from "../../Common/Img";
import DetailPart from "./DetailPart";
import PostDetail from "./PostDetails";

function BodyContent ({blogsData, side,data}) {

    return (
      <section className="section-b-space bg-white">
        <div className="container">
          <div className="row">
            {side !== "no" && (
              <div className={`col-lg-3`}>
                <Sidebar value={blogsData} />
              </div>
            )}
            <div className={"col-lg-9"}>
              <div className="blog-single-detail">
                <div className="top-image">{<Img src="/assets/images/portfolio/13.jpg" alt="" className="img-fluid " />}</div>
                <PostDetail data={data}/>
                <DetailPart data={data}/>
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  };
  
  export default BodyContent;