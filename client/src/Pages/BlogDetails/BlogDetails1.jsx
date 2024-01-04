import Breadcrumb from "../../Components/Blogs/Breadcrumb";
import BodyContent from "../../Components/BlogDetails/BlogContent1/BodyContent";
import Layout from "../../Layout/Layout";
import { useEffect, useState } from "react";
const dotenv = require('dotenv');
dotenv.config();

function BlogDetails(){  
    const  [blogsData, setBlogsData]= useState([]);

    // const targetId = param.id;
    const desiredBlog = blogsData.find(blog => blog.id === 1);

    useEffect(()=>{
        fetchData();
    },[])

    const fetchData = async () => {
        try {
          const result = (
            await axios.get(
              `http://localhost:5000/blogs`
            )
          ).data;
          
         console.log(result)
         setBlogsData(result)
        } catch (err) {
          setLoading(false);
        }
      };
    
    return(
        <>
        <Layout title="light_header"/>
        <Breadcrumb title="Home" subTitle="blog" bannerImg={"/assets/images/tour/inner-page/breadcrumb.jpg"}/>
        <BodyContent side="left" data={desiredBlog}/>
        </>
    )
    }
    export default BlogDetails;