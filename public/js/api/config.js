export const BASE_URL = "http://www.carmarketplace.local";

export const URLS = {
    getBrands: `${BASE_URL}/getCarBrands`,
    getModels: (brandId)  => `${BASE_URL}/getCarModels/${brandId}`,
    getGenerations: (modelId)  => `${BASE_URL}/getModelGeneration/${modelId}`,
  };