// import Breadcrumb from "../Components/Blogs/Breadcrumb";
import Layout from "../Layout/Layout";
import BlogContent from "../Components/Blogs/BlogContent";




function Blogs({blogsData}) {
 
  return (
    <>
      <Layout title="light_header" />

      <BlogContent value={blogsData} side="left" view={"creative"} />

      {/* <ComingSoon/> */}
    </>
  );
}
export default Blogs;
