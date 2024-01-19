import { useEffect, useState } from "react";
import BodyContent from "../../Components/BlogDetails/BlogContent1/BodyContent";
import Layout from "../../Layout/Layout";
import { useParams } from "react-router-dom";
import { fetchData } from "../../Utility/ca_admin";
import Loader from "../../Layout/Loader";
import { Helmet } from "react-helmet";

function BlogDetails() {
  const [blogsData, setBlogsData] = useState([]);

  useEffect(() => {
    const fetchBlogsData = async () => {
      try {
        const data = await fetchData();
        setBlogsData(data.blogs);
      } catch (error) {
        // Handle error, e.g., show an error message
        console.error("Error fetching data:", error);
      }
    };

    fetchBlogsData();
  }, []); // Empty dependency array means this effect runs only once when the component mounts

  const param = useParams();
  const desiredBlog = blogsData.find(
    (blog) => blog?.blog_title.replace(/ /g, "-") === param.blog_title
  );

  console.log(desiredBlog);

  return (
    <>
      {blogsData.length === 0 ? (
        <Loader loaderTimeout={1000} />
      ) : (
        <>
          <Helmet>
            <title>
              {" "}
              {desiredBlog.blog_title}{" "}
            </title>
            <meta
              name="description"
              content={desiredBlog.meta_description}
            />
            <meta
              name="keywords"
              content={desiredBlog.meta_keywords}
            />
            <link
              rel="canonical"
              href={`https://sewaktravels.com/${desiredBlog.slug}`}
            />
          </Helmet>
          <Layout title="light_header" />
          <BodyContent side="left" blogsData={blogsData} data={desiredBlog} />
        </>
      )}
    </>
  );
}
export default BlogDetails;
