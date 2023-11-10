import ContentPage from "./ContentPage";
import MixTopContent from "./MixTopContent";
import Sidebar from "./Sidebar";

const BlogContent = ({ value, side, view}) => {
    return (
      <section className={`section-b-space bg-white`}>
        <div className="container">
          <div className="row">
            {side !== "no" && (
              <div className={`col-lg-3`}>
                <Sidebar />
              </div>
            )}
            <div className={`${side === "no" ? "col-lg-12" : "col-lg-9"}`}>
              <div className={"blog_section blog-inner ratio_landscape"}>
                <MixTopContent data={value}/>
                <ContentPage slideData={value} view={view} />
              </div>
            </div>
          </div>
        </div>
      </section>
    );
  };
  
  export default BlogContent;