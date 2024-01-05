import BodyContent from "../../Components/BlogDetails/BlogContent1/BodyContent";
import Layout from "../../Layout/Layout";
import { useParams } from "react-router-dom";


function BlogDetails({blogsData}){  



    const param = useParams();
    const desiredBlog = blogsData.find(blog => blog.id === parseInt(param.id));

    console.log("blogsData",blogsData)

    return(
        <>
        <Layout title="light_header"/>
        <BodyContent side="left" blogsData={blogsData} data={desiredBlog}/>
        </>
    )
    }
    export default BlogDetails;