import { useEffect, useState } from "react";
import BodyContent from "../../Components/BlogDetails/BlogContent1/BodyContent";
import Layout from "../../Layout/Layout";
import { useParams } from "react-router-dom";
import { fetchData } from "../../Utility/ca_admin";
import Loader from "../../Layout/Loader";



function BlogDetails(){  

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


    const param = useParams();
    const desiredBlog = blogsData.find(blog => blog?.blog_title.replace(/ /g, '-') ===param.blog_title);


    return(
        <>
        {blogsData.length ===0 ? <Loader loaderTimeout={1000}/> : <><Layout title="light_header"/>
        <BodyContent side="left" blogsData={blogsData} data={desiredBlog}/></>}
        
        </>
    )
    }
    export default BlogDetails;