import Breadcrumb from "../../Components/Blogs/Breadcrumb";
import BodyContent from "../../Components/BlogDetails/BlogContent1/BodyContent";
import Layout from "../../Layout/Layout";
import { blogsData } from "../../Data/BlogData";

function BlogDetails1(){  
    

    // const targetId = param.id;
    const desiredBlog = blogsData.find(blog => blog.id === 1);

    
    return(
        <>
        <Layout title="light_header"/>
        <Breadcrumb title="Home" subTitle="blog" bannerImg={"/assets/images/tour/inner-page/breadcrumb.jpg"}/>
        <BodyContent side="left" data={desiredBlog}/>
        </>
    )
    }
    export default BlogDetails1;