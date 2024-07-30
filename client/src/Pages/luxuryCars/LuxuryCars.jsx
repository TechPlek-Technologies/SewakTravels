import React from 'react';
import Layout from '../../Layout/Layout';
import FooterComponent from '../../Components/Common/FooterComponent';
import Banner from '../../Components/luxurycars/Banner';
import Gridview from '../../Components/luxurycars/Gridview';

const LuxuryCars = () => {
  const data = [
    {
      id: 1,
      gridImg: "/assets/img/luxury/mercedes.webp",
      name: "Mercedes Benz Maybach S-Class 500",
      description: [
        { pt1: "Fully Automatic Transmission." },
        { pt2: "Multi-function Steering Wheel." },
        { pt3: "Adjustable Steering Column." },
        { pt4: "Fully Loaded Vehicle with Leather Upholstery." },
        { pt5: "GPS tracking & Wi Fi." },
        { pt6: "AC & Heating." },
        { pt7: "Air Bags & ABS for extra safety." },
        { pt8: "Well Trained , Courteous & Professional Pilots in uniform." },
      ],
      category: "MERCEDES",
    },
    {
      id: 2,
      gridImg: "/assets/img/luxury/Mercedes-Benz-S-450.webp",
      name: "S Class 450",
      description: [
        { pt1: "Fully Automatic Transmission." },
        { pt2: "Multi-function Steering Wheel." },
        { pt3: "Fully Loaded Vehicle with Leather Upholstery." },
        { pt4: "GPS tracking & Wi Fi." },
        { pt5: "AC & Heating." },
        { pt6: "Air Bags & ABS for extra safety." },
        { pt7: "Well Trained , Courteous & Professional Pilots in uniform." },
      ],
      category: "MERCEDES",
    },
    {
      id: 3,
      gridImg: "/assets/img/luxury/EClass220.webp",
      name: "E Class 220",
      description: [
        { pt1: "Fully Automatic Transmission." },
        { pt2: "Multi-function Steering Wheel." },
        { pt3: "Fully Loaded Vehicle with Leather Upholstery." },
        { pt4: "GPS tracking & Wi Fi." },
        { pt5: "AC & Heating." },
        { pt6: "Air Bags & ABS for extra safety." },
        { pt7: "Well Trained , Courteous & Professional Pilots in uniform." },
      ],
      category: "MERCEDES",
    },
    {
      id: 4,
      gridImg: "/assets/img/luxury/BMW7Series.webp",
      name: "BMW 7 Series",
      description: [
        { pt1: "Fully Automatic Transmission." },
        { pt2: "Fully Loaded with Leather Upholstery." },
        { pt3: "GPS tracking & Wi Fi." },
        { pt4: "AC & Heating." },
        { pt5: "Air Bags & ABS for extra safety." },
        { pt6: "Well Trained , Courteous & Professional Pilots in uniform." },
      ],
      category: "BMW",
    },
    {
      id: 5,
      gridImg: "/assets/img/luxury/BMW5.webp",
      name: "BMW 5 Series New Model",
      description: [
        { pt1: "Manufacturer - Toyota Kirloskar Motor" },
        { pt2: "Seating Capacity - 6" },
        { pt3: "SRS Airbags" },
      ],
      category: "BMW",
    },
    {
      id: 6,
      gridImg: "/assets/img/luxury/AudiQ7.webp",
      name: "Audi Q7",
      description: [
        { pt1: "Upholstery in Cricket leather" },
        { pt2: "4-zone air conditioning" },
        { pt3: "Bose sound system" },
        { pt4: "Sports styling package" },
        { pt5: "8 airbags" },
        { pt6: "Tyre pressure monitor display" },
        { pt7: "Electronic Stabilization control (ESC)" }
      ],
      category: "Audi Q7",
    },
    {
        id: 7,
        gridImg: "/assets/img/luxury/CamryHybrid.webp",
        name: "Camry Hybrid",
        description: [
          { pt1: "Manufacturer - Toyota Kirloskar Motors Ltd." },
          { pt2: "Seating Capacity: 3+1" },
        ],
        category: "TOYOTA",
      },
  ];


  return (
    <>
      <Layout title="light_header" userBgClass="user user-light" />
      <Banner title="cab search"/>
      <Gridview latestFilter  type={"cab"} size={3} topFilter={true} value={data} gridType="grid-view" grid4Img={true} gridOption={true} side="no"/>
      <FooterComponent />
    </>
  )
}

export default LuxuryCars
