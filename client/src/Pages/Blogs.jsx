// import Breadcrumb from "../Components/Blogs/Breadcrumb";
import Layout from "../Layout/Layout";
import BlogContent from "../Components/Blogs/BlogContent";
import axios from "axios";

import ComingSoon from "./ComingSoon";
import { useEffect, useState } from "react";

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
