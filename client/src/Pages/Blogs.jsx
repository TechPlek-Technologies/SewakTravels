// import Breadcrumb from "../Components/Blogs/Breadcrumb";
import Layout from "../Layout/Layout";
import BlogContent from "../Components/Blogs/BlogContent";
import { Helmet } from "react-helmet";

function Blogs({ blogsData }) {
  console.log("blogsData", blogsData.blogs);

  return (
    <>
      <Helmet>
      <title> Explore India: Sewak Travels Blogs-Tips, Insights, Travel Guides. </title>
        <meta
          name="description"
          content=" Explore India through Sewak Travels Blog - your source for travel tips, insights, and inspiration. Discover tailored travel guides for family trips and business travel adventures."
        />
      </Helmet>

      <Layout title="light_header" />

      <BlogContent value={blogsData} side="left" view={"creative"} />

      {/* <ComingSoon/> */}
    </>
  );
}
export default Blogs;
