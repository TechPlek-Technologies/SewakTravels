// import Breadcrumb from "../Components/Blogs/Breadcrumb";
import Layout from "../Layout/Layout";
import BlogContent from "../Components/Blogs/BlogContent";
import { Helmet } from "react-helmet";
import { useEffect, useState } from "react";
import { fetchData } from "../Utility/ca_admin";
import Loader from "../Layout/Loader";


function Blogs() {
  const [blogsData, setBlogsData] = useState([]);

  useEffect(() => {
    const fetchBlogsData = async () => {
      try {
        const data = await fetchData();
        setBlogsData(data.blogs);
      } catch (error) {
        // Handle error, e.g., show an error message
        console.error('Error fetching data:', error);
      }
    };

    fetchBlogsData();
  }, [blogsData]); // Empty dependency array means this effect runs only once when the component mounts
  return (
    <>
      <Helmet>
      <title> Explore India: Sewak Travels Blogs-Tips, Insights, Travel Guides. </title>
        <meta
          name="description"
          content=" Explore India through Sewak Travels Blog - your source for travel tips, insights, and inspiration. Discover tailored travel guides for family trips and business travel adventures."
        />
  <link rel="canonical" href="https://www.sewaktravels.com/blogs" />

      </Helmet>
      {blogsData.length ===0 ? <Loader loaderTimeout={1000}/> : <> <Layout title="light_header" />

<BlogContent value={blogsData} side="left" view={"creative"} /></>}

     

      {/* <ComingSoon/> */}
    </>
  );
}
export default Blogs;
