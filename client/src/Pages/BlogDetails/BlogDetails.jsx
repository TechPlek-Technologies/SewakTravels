import BodyContent from "../../Components/BlogDetails/BlogContent1/BodyContent";
import Layout from "../../Layout/Layout";
import { useParams } from "react-router-dom";


function BlogDetails({blogsData}){  


    console.log("blogsData",blogsData)

    const param = useParams();
    console.log(param)
    const desiredBlog = blogsData.find(blog => blog?.blog_title.replace(/ /g, '-') ===param.blog_title);

    console.log("blogsData2",desiredBlog)

    return(
        <>
        <Layout title="light_header"/>
        <BodyContent side="left" blogsData={blogsData} data={desiredBlog}/>
        </>
    )
    }
    export default BlogDetails;