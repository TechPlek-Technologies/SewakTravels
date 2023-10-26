import { useRoutes } from 'react-router-dom';
import './App.css';
import Home from './Pages/Home';
import CabListing from './Pages/CabListing';
import Blogs from './Pages/Blogs';
import BlogDetails1 from './Pages/BlogDetails/BlogDetails1';

function App() {
  
  const routes = useRoutes([
    { path: '/', element: <Home /> },
    {path: '/blogs', element: <Blogs/>},
    {path: '/blogs/:id', element: <BlogDetails1/>},,
    { path: '/cab/listing/:source?/:destination?', element: <CabListing/> }
]);

  return routes;

}

export default App;
