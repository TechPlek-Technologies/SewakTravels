import Breadcrumb from "../Components/Blogs/Breadcrumb";
import Layout from "../Layout/Layout";
import { blogsData } from "../Data/BlogData";
import BlogContent from "../Components/Blogs/BlogContent";

function Blogs(){
    
return(
    <>
    <Layout title="light_header"/>
    <Breadcrumb title="Home" subTitle="blog" bannerImg={"/assets/images/tour/inner-page/breadcrumb.jpg"}/>
    <BlogContent value={blogsData} side="left" view={"creative"} />
    </>
)
}
export default Blogs;