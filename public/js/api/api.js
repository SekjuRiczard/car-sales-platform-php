import { URLS } from "./config.js";

export async function fetchBrands() {
    const response = await fetch(URLS.getBrands);
    if(!response.ok){
        throw new Error('failed to fetch brands');
    }
    return response.json();
    }


export async function fetchModels(brandId) {
    const response = await fetch(URLS.getModels(brandId));
    if (!response.ok){
        throw new Error('Failed to fetch models');
    } 
    return response.json();
  }
  
export async function fetchGenerations(modelId) {
    const response = await fetch(URLS.getGenerations(modelId));
    if (!response.ok){
        throw new Error('Failed to fetch generations');
    } 
    return response.json();
  }